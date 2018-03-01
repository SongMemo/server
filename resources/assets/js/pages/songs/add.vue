
<template>
  <div>
    <div class="form-group">
      <router-link :to="songs" class="btn btn-default">Back</router-link>
    </div>

    <card :title="$t('add_song')" >
      <div class="panel-body">

        <div class="col-md-12">
          <form v-on:submit="saveForm()">

            <div class="row">
              <div class="col-xs-12 col-md-10 form-group">
                <label class="control-label">{{ $t('title') }}</label>
                <input type="text" v-model="song.title" class="form-control">
              </div>

              <div class="form-group col-xs-12 col-md-2">
                <label>{{ $t('key') }}</label>
                <select class="form-control" v-model="song.key_id">
                  <option v-for="key in keys" v-bind:value="key.id">{{ key.title }}</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 form-group">
              <label class="control-label">{{ $t('song_text') }}</label>
              <textarea v-model="song.text" class="form-control" rows="10"></textarea>
            </div>

            <div class="col-xs-12 form-group">
              <button class="btn btn-success">{{ $t('add') }}</button>
            </div>

          </form>
        </div>
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
        // todo: maybe store in js
        keys: [],
        song: {
          title: '',
          text: '',
          key_id: '',
        }
      }
    },
    mounted() {
      let app = this;
      axios.get('/api/keys')
        .then(function (resp) {app.keys = resp.data})
        .catch(function (resp) {console.log("Could not load keys")});
    },
    methods: {
      saveForm() {
        event.preventDefault();
        let app = this;
        let newsong = app.song;
        axios.post('/api/songs', newsong)
          .then(function (resp) {app.$router.push({path: '/songs'})})
          .catch(function (resp) {console.log("Could not create your song")});
      }
    }
  }
</script>
