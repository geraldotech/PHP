<script>
export default {
  name: 'Foo',
  props: {
    message: {
      type: String,
      required: true,
    },
  },
  setup(props) {
   /*  const reverseMessage = () => {
      return props.message.split('').reverse().join('');
    }; */

   // return { reverseMessage };
  }
};
</script>

<template>
  <footer>
    <p>Footer props: {{ message }}</p>
  <!--   <p>Reversed Message: {{ reverseMessage() }}</p> -->
  </footer>
</template>
<style scoped>
  footer{
    background: #333;
    padding: .5rem;
  }
</style>
