lista_nome = []
lista_nota = []

while True:
    print("teste - codigos...")

    nome_aluno = input("Digite o nome:")
    nota_aluno = int(input("Digite a nota:"))

    lista_nome.append(nome_aluno)
    lista_nota.append(nota_aluno)

    sair = input("Deseja sair? (S/N)")   
    if(sair == 'S'):
        break

indice = 0
for nome in lista_nome:
    print(nome, lista_nota[indice])

    nota = lista_nota[indice]
    if(nota >= 7):
        print("Aprovado")
    else:
        print("Reprovado")

    indice += 1