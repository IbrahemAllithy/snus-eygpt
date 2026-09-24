<template>
  <div class="d-flex flex-column-fluid">
    <div class="container-fluid">
      <div class="card card-custom gutter-b bg-white border-0">
        <div class="card-header border-0 align-items-center">
          <h3 class="card-label mb-0 font-weight-bold text-body">Site Content</h3>
        </div>
        <div class="card-body">
          <p>
            الصور ومساحات المنتجات تتعدل من
            <a href="/site-content">صفحة الصور والمساحات</a>
            وترتبط مباشرة بالمتجر. اترك الصف فارغًا ليبقى مكانًا جاهزًا لمنتج جديد.
          </p>
          <div v-for="group in groups" :key="group.key" class="mb-4">
            <h4>{{ group.label }}</h4>
            <div v-for="item in group.items" :key="item.key" class="border rounded p-3 mb-3">
              <strong>{{ item.label }}</strong>
              <p v-if="item.hint" class="text-muted mb-2">{{ item.hint }}</p>
              <textarea v-if="item.type === 'textarea'" class="form-control" rows="3" v-model="item.value"></textarea>
              <input v-else-if="item.type === 'text'" class="form-control" v-model="item.value">
              <textarea v-else class="form-control" rows="8" :value="pretty(item.value)" @change="parseJson(item, $event.target.value)"></textarea>
            </div>
          </div>
          <button class="btn btn-primary" type="button" @click="save">Save</button>
          <p class="mt-3">{{ message }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return { groups: [], message: '' };
  },
  mounted() {
    this.load();
  },
  methods: {
    headers() {
      return { headers: { Authorization: `Bearer ${localStorage.getItem('token')}` } };
    },
    load() {
      axios.get('/api/admin/site-content', this.headers()).then((res) => {
        if (res.data.status === 'Success') this.groups = res.data.data.groups;
      });
    },
    pretty(value) {
      return JSON.stringify(value, null, 2);
    },
    parseJson(item, raw) {
      try {
        item.value = JSON.parse(raw);
        this.message = '';
      } catch (error) {
        this.message = 'JSON غير صالح في: ' + item.label;
      }
    },
    save() {
      const items = this.groups.flatMap((group) => group.items).map((item) => ({
        key: item.key,
        value: item.value,
      }));
      axios.put('/api/admin/site-content', { items }, this.headers()).then((res) => {
        this.message = res.data.message || 'Saved';
        this.groups = res.data.data.groups;
      }).catch((error) => {
        this.message = error.response?.data?.message || 'Save failed';
      });
    },
  },
};
</script>
