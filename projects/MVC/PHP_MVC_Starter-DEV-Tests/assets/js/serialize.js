const form001 = document.getElementById('form001')

/* ============Serialização via serializeForm (URL Encoded)========= */
// Back-end (PHP): $data = $_POST; // Captura normalmente via $_POST

function request() {
  fetch(`${url}/Serialize/endpoint1`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: serializeForm(form001),
  })
    .then((response) => {
      if (!response.ok) {
        console.error('Erro com o servidor:', response.statusText)
        return Promise.reject(response.statusText) // Rejeita para ir direto para o `catch`
      }
      // return response.text(); // ou `response.json()` se for JSON
      return response.json() // Retorna o JSON processado
    })
    .then((res) => {
      console.log('Resposta do servidor:', res)
    })
    .catch((error) => {
      console.error('Erro na requisição:', error)
    })
}

/* ===================================== */

/* === Com Serialização via serializeFormToJSON ou serializeFormToJSONGeraldo (JSON) === */
// $data = json_decode(file_get_contents('php://input'), true); // Decodifica JSON recebido
// APIs modernas: é o melhor caminho! 🚀🔥

function request2() {
  fetch(`${url}/Serialize/endpoint2`, {
    method: 'POST',
    headers: { Accept: 'application/json', 'Content-Type': 'application/json' },
    body: serializeFormToJSONGeraldo(form001), // ou serializeFormToJSON(form001)
    //body: JSON.stringify({ title: 'gmap.dev', body: 'g@map.dev' }),
  })
    .then((req) => {
      if (!req.ok) {
        console.error('Erro com o servidor:', req.statusText)
        return Promise.reject(req.statusText) // Rejeita para ir direto para o `catch`
      }
      return req.json() // Converte a resposta para JSON
    })
    .then((res) => {
      console.warn('Resposta do servidor:', res)
    })
    .catch((error) => {
      console.error('Erro na requisição:', error)
    })
}

/* === Sem Serialização (FormData puro) === */
// Back-end (PHP)
// quando você usa FormData, o navegador automaticamente define o cabeçalho correto para envio de formulários. O navegador automaticamente adiciona o Content-Type: multipart/form-data com um boundary, necessário para processar arquivos e campos do formulário.

function request3() {
  const formData = new FormData(form001)

  if (Object.fromEntries(new FormData(form001)).f_age === '') {
    console.log(`idade está vazia`)
    return
  }

  fetch(`${url}/Serialize/endpoint3`, {
    method: 'POST',
    body: formData,
  })
    .then((req) => {
      if (!req.ok) {
        console.error('erro com o servidor', req.statusText) // Corrigido aqui
        return
      }
      return req.json()
    })
    .then((json) => {
      console.log(json)
    })
    .catch((error) => {
      console.error('Erro na requisição:', error)
    })
}

function request4() {
  const operadora = document.getElementById('operadora').value
  const concordachecked = document.querySelector("#noform input[name='concorda']:checked")?.value

  if (!concordachecked || !operadora) {
    console.log(`missing values`)
    return
  }

  // fazer append na instancia do formData ou usar a funcao makeAppend
  const formData = new FormData()
  formData.append('concordachecked', concordachecked)
  formData.append('operadora', operadora)

  fetch(`${url}/Serialize/endpoint4`, {
    method: 'POST',
    //  body: formData,
    body: makeAppend({ concordachecked, operadora }),
  })
    .then((req) => {
      if (!req.ok) {
        console.error('erro com o servidor', req.statusText) // Corrigido aqui
        return
      }
      return req.json()
    })
    .then((json) => {
      console.log('server response =>', json)
    })
    .catch((error) => {
      console.error('Erro na requisição:', error)
    })
}

/* ============ FUNCOES ============= 
#########################################################################################################
*/

/*
 * FN - BY GMAPDEV - CASO NÃO TENHA FORM ID
 * Criar um FormData a partir de um objeto de variáveis.
 * Cada chave do objeto será usada como nome do campo no FormData.
 *
 * Exemplo de uso:
 * const formData = makeAppend({ usuario_cod: 123, status: "ativo" });
 *
 * Resultado esperado no servidor ($_POST em PHP):
 * {
 *   "usuario_cod": "123",
 *   "status": "ativo"
 * }
 *
 * @param {Object} variables - Objeto contendo as variáveis a serem adicionadas ao FormData.
 * @returns {FormData} formData2 - Instância de FormData preenchida com os valores fornecidos.
 */
function makeAppend(variables) {
  const formData2 = new FormData()

  Object.keys(variables).forEach((key) => {
    formData2.append(key, variables[key]) // Envia cada valor separadamente
  })

  return formData2
}

// front: usar os headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
// back: capturar com $_POST
function serializeForm(form) {
  return new URLSearchParams(new FormData(form)).toString()
}

// front: headers: { Accept: 'application/json', 'Content-Type': 'application/json',},
// back: json_decode(file_get_contents('php://input'), true);
function serializeFormToJSON(form) {
  const formData = new FormData(form)
  const obj = {}

  formData.forEach((value, key) => {
    // Se o campo já existir, transforma em array (para inputs com o mesmo nome)
    if (obj[key]) {
      obj[key] = [].concat(obj[key], value)
    } else {
      obj[key] = value
    }
  })

  return JSON.stringify(obj)
}

// front: headers: { Accept: 'application/json', 'Content-Type': 'application/json',},
// back: json_decode(file_get_contents('php://input'), true);
// passar o id do formulario diretamente
function serializeFormToJSONGeraldo(form) {
  return JSON.stringify(Object.fromEntries(new FormData(form)))
}
