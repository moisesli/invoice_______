app.component('input_', {
    template: `
  <input
  :type="type"
  :value="modelValue"
  @change="$emit('update:modelValue', $event.target.value)"
  class="
          bg-gray-50
          border border-gray-300
          text-gray-900 sm:text-base
          rounded-lg
          focus:outline-none focus:border-cyan-600 focus:ring-cyan-600 focus:ring-2
          block w-full p-2.5"
  :placeholder="placeholder"/>`,
    props: {
        type: String,
        placeholder: String,
        modelValue: String
    }
});