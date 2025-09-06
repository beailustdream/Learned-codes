#Codigos exercicio 1
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 1  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

avaliacoes = [8, 7, 9, 6, 10]
soma_avaliacoes = 0

for nota in avaliacoes:
    soma_avaliacoes += nota

media = soma_avaliacoes / len(avaliacoes)
print(f"Média das avaliações: {media:.2f}")

#Codigos exercicio 2
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 2  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

playlist = ["Shape of You", "Blinding Lights", "Levitating", "Perfect", "Dance Monkey"]
musica_procurada = "Levitating"

if musica_procurada in playlist:
    print("Música encontrada na playlist!")
else:
    print("Música não encontrada na playlist.")

#Codigos exercicio 3
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 3  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

pedidos_do_dia = ["pizza", "hambúrguer", "refrigerante", "pizza", "sorvete"]
quantidade_pedidos = len(pedidos_do_dia)
print(f"Quantidade de pedidos do dia: {quantidade_pedidos}")

#Codigos exercicio 4
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 4  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

convidados = ["Ana", "Bruno", "Carlos", "Diana"]

for nome in convidados:
    print(f"Olá, {nome}! Você está convidado(a) para a festa.")

#Codigos exercicio 5
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 5  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

historico = [
    "https://www.google.com/search?q=google.com",
    "youtube.com",
    "https://www.wikipedia.org"
]
novo_site = "https://www.github.com"
historico.append(novo_site)

print("Histórico de navegação:")
for site in historico:
    print(site)

#Codigos exercicio 6
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 6  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

usuarios_validos = ["joao", "maria", "ana", "carlos", "beatriz"]
usuario_digitado = "ana"  # Altere para testar outros nomes

acesso = False
for usuario in usuarios_validos:
    if usuario == usuario_digitado:
        acesso = True
        break

if acesso:
    print("Acesso concedido!")
else:
    print("Usuário não encontrado. Acesso negado.")

#Codigos exercicio 7
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 7  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

distancias_km = [5, 10, 21.1, 42.2, 100]
distancias_milhas = []

for km in distancias_km:
    milhas = km * 0.621371
    distancias_milhas.append(milhas)

print("Distâncias em quilômetros:", distancias_km)
print("Distâncias em milhas:", [f"{m:.2f}" for m in distancias_milhas])

#Codigos exercicio 8
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 8  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

inventario = ("maçã", 10, "caixa", 5, "banana", 7, "garrafa", 3)
total_itens = 0

for item in inventario:
    if isinstance(item, int):
        total_itens += item

print(f"Quantidade total de itens no inventário: {total_itens}")

#Codigos exercicio 9
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 9  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

numeros_ordenados = [1, 2, 3, 4, 5, 5, 6, 7, 8, 9]
numero_procurado = 5

contador = 0
for numero in numeros_ordenados:
    if numero == numero_procurado:
        contador += 1

if contador > 0:
    print(f"Número encontrado e ele apareceu {contador} vezes.")
else:
    print("Número não encontrado.")

#Codigos exercicio 10
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 10  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

notas_turma = [8.5, 6.0, 7.2, 5.5, 9.0, 4.8, 7.0, 6.9, 10.0, 3.5]
aprovados = []
reprovados = []

for nota in notas_turma:
    if nota >= 7:
        aprovados.append(nota)
    else:
        reprovados.append(nota)

print("Notas dos aprovados:", aprovados)
print("Notas dos reprovados:", reprovados)

print("- - - - - - - - - - - - - - - - - - - - -")
#Happy ending! :)print()
print("Exercícios concluídos com sucesso! Como dizia Mikey de Tokyo revengers, Bye Bye! :)")
print("- - - - - - - - - - - - - - - - - - - - -")