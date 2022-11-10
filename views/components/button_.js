app.component('button_', {
    template: `
      <button type="button"
        :class="[
          this.color == 'cyan' ? 'text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center' : ''
        ]"
        :disabled="disabled">
        <slot></slot>
      </button>`,
    props: {
        color: String,
        disabled: Boolean
    }
});