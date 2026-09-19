<template>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                <li class="breadcrumb-item active" aria-current="page">Dashboard <strong> v {{ version.setting_value }}</strong></li>
            </ol>
        </nav>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            version: "",
            token: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
    },

    methods: {
        fetchVersion() {
            var url = "/api/admin/store-version";

            axios.get(url, this.token).then(res => {
                console.warn('version', res.data.data);
                this.version = res.data.data;
            }).finally(() => (this.$parent.loading = false));
        },
    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchVersion();
    }
}
</script>
