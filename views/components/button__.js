app.component('button__', {
    template: `
      <button 
        type="submit"
        class="
          text-white 
          bg-cyan-600 
          hover:bg-cyan-700 
          focus:ring-4 
          focus:ring-cyan-200 
          font-medium 
          rounded-lg 
          text-base 
          px-7 py-3 
          w-full 
          sm:w-auto 
          text-center">
        <slot></slot>
      </button>`,
    props: {
        color: String,
        disabled: Boolean
    }
});