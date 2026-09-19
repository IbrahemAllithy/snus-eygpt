<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
        <div class="card-title mb-0">
          <h3 class="card-label mb-0 font-weight-bold text-body">Merger</h3>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div
                class="card card-custom gutter-b bg-transparent shadow-none border-0"
              >
                <div
                  class="card-header align-items-center border-bottom-dark px-0"
                ></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 text-center">
            <label class="mr-3"
              >Web Merge <input type="radio" value="web" v-model="selected"
            /></label>
            <label
              >App Merge <input type="radio" value="app" v-model="selected"
            /></label>
          </div>
        </div>

        <div class="row">
          <div v-show="selected === 'web'" class="col-12 p-r-l-40">
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
                        Web Merge
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
                            v-model="merger.purchase_Code"
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
                      <button class="btn btn-primary" @click="merge()">
                        Merge
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-show="selected === 'app'" class="col-12 p-r-l-40">
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
                        App Merge
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
                            v-model="merger.purchase_Code"
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
                      <button class="btn btn-primary" @click="mergeMobile()">
                        Merge
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
</template>

<script>
export default {
  name: "Merge",
  data() {
    return {
      merger: {
        purchase_Code: "",
      },
      selected: "web",
      token: [],
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    merge() {
      this.$parent.loading = true;
      var url =
        "/api/admin/merge?purchase_code=" +
        this.merger.purchase_Code +
        "&merge_request=web";

      axios
        .get(url, this.token)
        .then((res) => {
          if (res.data.status == "success") {
            //console.log('ssss', res);
            this.$toaster.success("Web Merge Successfully");
            this.merger.purchase_Code = "";
          } else {
            this.$toaster.error(res.data.message);
            this.merger.purchase_Code = "";
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    mergeMobile() {
      this.$parent.loading = true;
      var url =
        "/api/admin/merge?purchase_code=" +
        this.merger.purchase_Code +
        "&merge_request=app";

      axios
        .get(url, this.token)
        .then((res) => {
          if (res.data.status == "success") {
            //console.log("ssss", res);
            this.$toaster.success("Mobile App Merge successfully");
            this.merger.purchase_Code = "";
          } else {
            this.$toaster.error(res.data.message);
            this.merger.purchase_Code = "";
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
.p-r-l-40 {
  padding-right: 40px;
  padding-left: 40px;
}
</style>