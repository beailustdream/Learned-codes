programa {
  funcao inicio() {
		cadeia nome[] = { "Andre", "Thiago" , "Bruno", "Carlos", "Cassio" }
		real altura[] = { 1.71, 1.78, 1.75, 1.87, 1.71 }

		// Cria o cabeçalho da tabela
		escreva ("--------------------\n")
		escreva ("       TABELA       \n")
		escreva ("--------------------\n")
    	/* Perocorre os vetores exibindo as informações. Note que as informações
		 * são relacionadas, colocando-as na mesmas na mesma posição em ambos os 
		 * vetores. Por exemplo, se quiséssemos incluir a idade de cada pessoa,
		 * criaríamos mais um vetor do tipo inteiro e a idade de Andre, seria 
		 * armazenada na posição 0 do novo vetor, a idade de Thiago, na posição 1, 
		 * a de Bruno na posição 2, e assim por diante.
		 */		 
    para (inteiro posicao = 0; posicao < 5; posicao++)
		{
			// O caracter especial \t serve para escrever uma tabulação
			escreva (nome[posicao], "\t\t", altura [posicao], "\n")
		}
 }

}




