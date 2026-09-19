<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <div
                  class="card card-custom gutter-b bg-transparent shadow-none border-0"
                >
                  <div
                    class="card-header align-items-center border-bottom-dark px-0"
                  >
                    <div class="card-title mb-0">
                      <h3 class="card-label mb-0 font-weight-bold text-body">
                        Check Updates
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-12">
                        <label>Enter Purchase Code</label>
                        <fieldset class="form-group mb-3">
                          <input
                            class="form-control"
                            type="text"
                            name="purchase_code"
                            placeholder="Please Enter Purchase Code"
                            v-model="updater.purchase_Code"
                          />
                        </fieldset>
                        <!-- <small
                                                    class="form-text text-danger"
                                                    v-if="
                                                        errors.has(
                                                            'purchase_code'
                                                        )
                                                    "
                                                    v-text="
                                                        errors.get(
                                                            'purchase_code'
                                                        )
                                                    "
                                                ></small> -->
                      </div>
                    </div>
                    <div
                      class="col-md-12 d-flex justify-content-end padding-right-0"
                    >
                      <button class="btn btn-primary" @click="fetchupdates()">
                        Check Update
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-xl-12">
                <div class="gutter-b bg-white border-0">
                  <div class="">
                    <div class="row">
                      <div class="col-4">
                        <label class="p-9"
                          >Total Updates Found:
                          <strong class="btn-primary p-9">{{
                            total_updates ? total_updates : "You are upto date"
                          }}</strong></label
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-lg-12 col-xl-12"
                v-for="(update, index) in updates"
                :key="index"
              >
                <div
                  class="card card-custom gutter-b bg-white border-0"
                  :class="[currentIndex > index ? display_button : '']"
                >
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <label class="p-9">Version: {{ update }}</label>
                      </div>
                      <div class="col-md-4 d-flex justify-content-end">
                        <button
                          class="btn btn-primary"
                          v-if="
                            $parent.permissions.includes(
                              'update-setting-manage'
                            )
                          "
                          :disabled="index > currentIndex"
                          @click="downloadZip(update, index)"
                        >
                          Update
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "UpdateMerge",
  data() {
    return {
      updater: {
        purchase_Code: "",
      },
      updates: [],
      total_updates: "0",
      message: "",
      currentIndex: 0,
      display_button: "d-none",
    };
  },

  methods: {
    fetchupdates(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url =
        page_url ||
        "/api/admin/get-updates?purchase_code=" + this.updater.purchase_Code;

      axios
        .get(page_url, this.token)
        .then((res) => {
          if (res.data.status == "success") {
            console.warn("updates", res.data.data);
            this.updates = res.data.data;
            this.total_updates = res.data.total_updates;
            this.$toaster.success("Update get successfully");
          } else {
            this.$toaster.error("Invalid Purchase Code");
          }
        })
        .finally(() => (this.$parent.loading = false));
    },

    downloadZip(update, index) {
      this.$parent.loading = true;
      var url =
        "/api/admin/download-zip?purchase_code=" +
        this.updater.purchase_Code +
        "&file_version=" +
        update;
      axios
        .get(url, this.token)
        .then((res) => {
          if (res.data.status == "success") {
            //console.log('ssss', res);
            this.$toaster.success("Updated successfully");
            this.currentIndex = index + 1;
          } else {
            this.$toaster.error(res.data.message);
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
  },

  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
  },
};
</script>

<style scoped>
.p-9 {
  padding: 9px;
}

.padding-right-0 {
  padding-right: 0;
}
</style>