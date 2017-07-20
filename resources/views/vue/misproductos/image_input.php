<template id="image_input">
<div class="image_input">
    <div v-if="!image">
        <h2>Select an image</h2>
        <input type="file" @change="onFileChange">
    </div>
    <div v-else>
        <img :src="image" />
        <button @click="removeImage">Remove image</button>
    </div>
</div>
</template>
<script>
const image_input = {
//   el: '#app',
    template: '#image_input',
  data: {
    image: ''
  },
  methods: {
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    }
  }
}
</script>
<style>
.image_input {
  text-align: center;
}
img {
  width: 30%;
  margin: auto;
  display: block;
  margin-bottom: 10px;
}
</style>