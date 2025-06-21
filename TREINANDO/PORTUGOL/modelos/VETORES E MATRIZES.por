programa {

 inclua biblioteca Util --> util
  funcao inicio() {

    inteiro vetor[10]

    para (inteiro posicao = 0; posicao < 10; posicao++)
  {
  vetor[posicao] = util.sorteia(1, 100)
  }
    escreva ("Vetor na ordem original:\n")
		
		para(inteiro posicao = 0; posicao < 10; posicao++)
		{
			escreva (vetor[posicao], " ")
		}
    escreva ("\n\nVetor na ordem inversa:\n")
		
		para(inteiro posicao = 9; posicao >=0; posicao--)
		{
			escreva (vetor[posicao], " ")
		}
  }
}
