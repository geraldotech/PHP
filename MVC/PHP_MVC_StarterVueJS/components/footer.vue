<script>
export default {
  name: 'MyComponent',
  props: {
    message: {
      type: String,
      required: true,
    },
  },
  setup(props) {
    const reverseMessage = () => {
      return props.message.split('').reverse().join('');
    };

    return { reverseMessage };
  }
};
</script>

<template>
  <div>
    <p>Original Message: {{ message }}</p>
    <p>Reversed Message: {{ reverseMessage() }}</p>
  </div>
</template>
