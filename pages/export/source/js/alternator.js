// variables
const $_button_set_rotas = document.querySelector("#set_rotas");
const $_button_set_pontos = document.querySelector("#set_pontos");

const $_fieldset_input_rotas = document.querySelector("#input_rotas");
const $_fieldset_input_pontos = document.querySelector("#input_pontos");

input_rotas_is_visible = $_fieldset_input_rotas.hidden;
input_pontos_is_visible = $_fieldset_input_pontos.hidden;

function alternate_input_rotas() {
  //
  input_rotas_is_visible  = (input_rotas_is_visible ? false : true);
  //
  $_fieldset_input_rotas.hidden = input_rotas_is_visible;

  console.log(input_rotas_is_visible);
}

function alternate_input_pontos() {
  //
  input_pontos_is_visible  = (input_pontos_is_visible ? false : true);
  //
  $_fieldset_input_pontos.hidden = input_pontos_is_visible;

  console.log("rotas", input_pontos_is_visible);
}
