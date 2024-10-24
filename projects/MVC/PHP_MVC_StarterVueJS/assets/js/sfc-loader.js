const options = {
  moduleCache: {
    vue: Vue,
  },
  async getFile(url) {
    const res = await fetch(url)
    if (!res.ok) throw Object.assign(new Error(res.statusText + ' ' + url), { res })
    return {
      getContentData: (asBinary) => (asBinary ? res.arrayBuffer() : res.text()),
    }
  },
  addStyle(textContent) {
    const style = Object.assign(document.createElement('style'), {
      textContent,
    })
    const ref = document.head.getElementsByTagName('style')[0] || null
    document.head.insertBefore(style, ref)
  },
}

/* By Geraldo Costa
 *  menos verboso e mais fácil de importar components
 */

/* imports */
const imports = (path) => {
  return Vue.defineAsyncComponent(() => loadModule(path, options))
}

/* auto import com path setado e extensão .vue */
const autoimports = (componame) => {
  return Vue.defineAsyncComponent(() => loadModule(`${url}/components/${componame}.vue`, options))
}

/* autoload + direct inject on app.vue */
const autoload = (namecompoennt) => {
  app.component(namecompoennt, autoimports(namecompoennt))
}

const { loadModule } = window['vue3-sfc-loader']
