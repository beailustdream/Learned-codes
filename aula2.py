#PARTE 2 DAS ATIVIDADES - CASA!
#EXERCICIO 6
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 6  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

import random
import string

senhas = []
quantidade = int(input("Quantas senhas deseja gerar? "))

for _ in range(quantidade):
    numeros = [random.choice(string.digits) for _ in range(7)]
    letras = [random.choice(string.ascii_letters) for _ in range(3)]
    senha_lista = numeros + letras
    random.shuffle(senha_lista)
    senha = ''.join(senha_lista)
    senhas.append(senha)

print("\nSenhas geradas:")
for s in senhas:
    print(s)

#EXERCICIO 7
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 7  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Lista de vendas do dia
vendas = [150.0, 200.5, 320.0, 80.75, 99.99]
total_vendas = 0

for valor in vendas:
    total_vendas += valor

vendedor_a = total_vendas * 0.6
vendedor_b = total_vendas * 0.4

print(f"Total de vendas do dia: R$ {total_vendas:.2f}")
print(f"Vendedor A recebeu: R$ {vendedor_a:.2f}")
print(f"Vendedor B recebeu: R$ {vendedor_b:.2f}")

#EXERCICIO 8
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 8  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Lista de produtos
produtos = ["Arroz", "Feijão", "Macarrão", "Óleo", "Açúcar", "Sal"]
produtos_com_a = []

for produto in produtos:
    if 'a' in produto.lower():
        produtos_com_a.append(produto)

print("Produtos que contêm a letra 'a':")
print(produtos_com_a)

#EXERCICIO 9
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 9  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

eventos = []

quantidade = int(input("Quantos eventos deseja adicionar? "))

for i in range(quantidade):
    nome = input(f"Digite o nome do evento {i+1}: ")
    data = input(f"Digite a data do evento {i+1} (ex: 25/09/2025): ")
    evento = (nome, data)
    eventos.append(evento)

print("\nLista de eventos do mês:")
for nome, data in eventos:
    print(f"Evento: {nome} | Data: {data}")

#EXERCICIO 10
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 10 - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Lista de votos (números dos candidatos)
votos = [1, 2, 1, 3, 2, 3, 2, 1, 1, 3, 2, 3]

# Lista de candidatos: [nome, total de votos]
candidatos = [
    ['Candidato A - Número 1', 0],
    ['Candidato B - Número 2', 0],
    ['Candidato C - Número 3', 0]
]

for voto in votos:
    if voto == 1:
        candidatos[0][1] += 1
    elif voto == 2:
        candidatos[1][1] += 1
    elif voto == 3:
        candidatos[2][1] += 1

print("\nResultado da eleição:")
for candidato in candidatos:
    print(f"{candidato[0]} recebeu {candidato[1]} votos.")

#HAPPY ENDING!
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("Exercícios concluídos com sucesso! Até a próxima, Arigato! :)")
print("- - - - - - - - - - - - - - - - - - - - -")
