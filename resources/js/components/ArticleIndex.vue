<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">All article</div>
          <div class="card-body">
            <router-link :to="{ name: 'create' }" class="btn btn-primary"
              >Buat Article Baru</router-link
            >
            <br />
            <br />

            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th width="50" class="text-center">no</th>
                    <th>Title</th>
                    <th width="200" class="text-center">action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(article, index) in articles"
                    :key="article.id"
                    class=""
                  >
                    <td width="50" class="text-center">{{ index + 1 }}</td>
                    <td>{{ article.title }}</td>
                    <td width="200" class="text-center">
                      <div class="btn-group">
                        <router-link
                          :to="{ name: 'show', param: { id: article.id } }"
                          class="btn btn-primary"
                          >Detail</router-link
                        >
                        <router-link
                          :to="{ name: 'edit', param: { id: article.id } }"
                          class="btn btn-primary"
                          >Edit</router-link
                        >
                        <button
                          class="btn btn-danger"
                          @click="deletePost(article.id)"
                        >
                          Delete
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      article: [],
    };
  },
  created() {
    let uri = "api/articles";
    this.axios.get(uri).then((response) => {
      this.article = response.data;
    });
  },
  methods: {
    deletePost(id) {
      this.$swal
        .fire({
          title: "apakah kamu yakin?",
          text: "jika di hapus data tidak dapat dikembalikan",
          icon: "warning",
          showCancelButton: true,
          cornfirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "hapus deh",
          cancelButtonText: "ga jadi",
        })
        .then((result) => {
          if (result.value) {
            this.$swal.fire({
              title: "success",
              text: "article deleted success",
              icon: "success",
              timer: 1000,
            });
            let uri = "api/articel/delete/${id}";
            this.axios.delete(uri).then((response) => {
              this.articles.splise(this.article.indexOf(id), 1);
            });
            console.log("delete articel woth  id");
          }
        });
    },
  },
};
</script>