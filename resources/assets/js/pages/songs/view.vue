
<template>
  <div>

    <div class="form-group">
      <router-link :to="songs" class="btn btn-default">Back</router-link>
    </div>

    <card :title="song.title">
      <router-link :to="{name: 'songs.edit', params: {id: song.id}}" class="btn btn-xs btn-default">
        {{ $t('edit') }}
      </router-link>
      <div class="col-md-12">
        <textarea class="form-control" rows="40">{{ song.text }}</textarea>
      </div>
    </card>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    middleware: 'auth',

    data: function () {
      return {
        song: []
      }
    },
    mounted() {
      let app = this;
      let id = app.$route.params.id;
      app.songId = id;
      axios.get('/api/songs/' + id)
        .then(function (resp) {app.song = resp.data})
        .catch(function () {console.log("Could not load your song")});
    },
  }
</script>
