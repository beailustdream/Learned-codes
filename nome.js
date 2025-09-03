//comentei
//variável let const
let nome = "Beatriz";
let idade = "22";
/**
 * Represents the height of a person in meters.
 * @type {string}
 * @example
 * let altura = "1.65";
 */
let altura = "1.65";
console.log("Olá, mundo!");
console.log(`Nome: ${nome}, Idade: ${idade}, Altura: ${altura}`);
//tipos primitivos: string, number, boolean, undefined, null
//string: texto
//number: número
//boolean: verdadeiro ou falso
//undefined: não definido
//null: nulo
//concatenação
let nomeCompleto = `${nome} Gonçalves da Silva`;
console.log(`Nome completo: ${nomeCompleto}`);
//operações matemáticas
let soma = 5 + 10;
let subtracao = 10 - 5;
let multiplicacao = 5 * 10;
let divisao = 10 / 5;
console.log(`Soma: ${soma}, Subtração: ${subtracao}, Multiplicação: ${multiplicacao}, Divisão: ${divisao}`);
//função
function apresentarDados() {
  console.log(`Nome: ${nome}, Idade: ${idade}, Altura: ${altura}`);
}
apresentarDados();
//array
let frutas = ["maçã", "banana", "laranja"];
console.log(`Frutas: ${frutas.join(", ")}`);
