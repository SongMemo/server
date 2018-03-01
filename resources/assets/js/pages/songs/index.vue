
<template>
  <div>
    <div class="form-group">
      <router-link :to="{name: 'songs.add'}" class="btn btn-success">{{ $t('add_song') }}</router-link>
    </div>

    <card :title="$t('songs_list')" >
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <!--<thead>-->
          <!--<tr>-->
            <!--<th></th>-->
            <!--<th width="200">&nbsp;</th>-->
          <!--</tr>-->
          <!--</thead>-->
          <tbody>
          <tr v-for="song, index in songs">
            <td>
              <router-link :to="{name: 'songs.view', params: {id: song.id}}">
                {{ song.title }}
              </router-link>
            </td>
            <td width="200">
              <router-link :to="{name: 'songs.edit', params: {id: song.id}}" class="btn btn-xs btn-default">
                <!-- <fa icon="edit" todo: fix icons />-->
                {{ $t('edit') }}
              </router-link>
              <a href="#"
                 class="btn btn-xs btn-danger"
                 v-on:click="deleteEntry(song.id, index)">
                <!-- <fa icon="trash" todo: fix icons />-->
                {{ $t('delete') }}
              </a>
            </td>
          </tr>
          </tbody>
        </table>
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
        songs: []
      }
    },
    mounted() {
      let app = this;
      axios.get('/api/songs')
        .then(function (resp) {app.songs = resp.data})
        .catch(function (resp) {console.log("Could not load songs")});
    },
    methods: {
      deleteEntry(id, index) {
        if (confirm("Do you really want to delete it?")) {
          let app = this;
          axios.delete('/api/songs/' + id)
            .then(function (resp) {app.songs.splice(index, 1)})
            .catch(function (resp) {alert("Could not delete song")});
        }
      }
    }
  }
</script>