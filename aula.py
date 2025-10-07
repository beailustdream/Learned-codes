#Codigos exercicio 1
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 1  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Inicializando os contadores
multiplos_de_2 = 0
multiplos_de_3 = 0

# Loop de 1 até 30 (inclusivo)
for i in range(1, 31):
    print(i, end=" ")  # imprime os números lado a lado
    
    # Verifica se é múltiplo de 2
    if i % 2 == 0:
        multiplos_de_2 += 1
    
    # Verifica se é múltiplo de 3
    if i % 3 == 0:
        multiplos_de_3 += 1

# Pula uma linha no final da sequência
print("\n")

# Mostra os resultados
print(f"Quantidade de múltiplos de 2: {multiplos_de_2}")
print(f"Quantidade de múltiplos de 3: {multiplos_de_3}")

#Codigos exercicio 2
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 2  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Contador regressivo de 15 até 0
for i in range(15, -1, -1):
    print(i, end=" ")
print()  # Pula linha ao final

#Codigos exercicio 3
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 3  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Verificação de Divisibilidade
numero = 10
if numero % 2 == 0 and numero % 5 == 0:
    print(f"O número {numero} é divisível por 2 e por 5 ao mesmo tempo.")
else:
    print(f"O número {numero} NÃO é divisível por 2 e por 5 ao mesmo tempo.")

#Codigos exercicio 4
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 4  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

    # Variável acumuladora
soma_total = 0

# Loop de 1 até 50 (inclusivo)
for i in range(1, 51):
    soma_total += i  # soma cada número à variável

# Exibe o resultado final
print("A soma dos números de 1 a 50 é:", soma_total)

#Codigos exercicio 5
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 5  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Variáveis de votos
votos_A = 0
votos_B = 0

print("=== Simulação de Votação ===")
print("Digite 1 para votar no Candidato A")
print("Digite 2 para votar no Candidato B")
print("Digite 0 para encerrar a votação\n")

while True:
    voto = int(input("Seu voto: "))
    
    if voto == 0:
        break  # encerra o loop
    elif voto == 1:
        votos_A += 1
    elif voto == 2:
        votos_B += 1
    else:
        print("Voto inválido! Digite 1, 2 ou 0.")

# Resultado da votação
print("\n=== Resultado da Votação ===")
print(f"Total de votos para A: {votos_A}")
print(f"Total de votos para B: {votos_B}")

if votos_A > votos_B:
    print("Candidato A é o vencedor!")
elif votos_B > votos_A:
    print("Candidato B é o vencedor!")
else:
    print("A votação terminou em empate!")

#Codigos exercicio 6
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 6  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Solicita um número ao usuário
numero = int(input("Digite um número de 1 a 10: "))

# Verifica se o número está no intervalo permitido
if 1 <= numero <= 10:
    print(f"\nTabuada do {numero}:")
    for i in range(1, 11):
        resultado = numero * i
        print(f"{numero} x {i} = {resultado}")
else:
    print("Número inválido! Digite um número entre 1 e 10.")

#Codigos exercicio 7
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 7  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Senha correta definida
senha_correta = "1234"
tentativas = 3

for tentativa in range(1, tentativas + 1):
    senha = input(f"Tentativa {tentativa} - Digite a senha: ")
    if senha == senha_correta:
        print("Acesso Concedido")
        break
else:
    print("Acesso Negado. Muitas tentativas.")

#Codigos exercicio 8
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 8  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

# Soma de pares e ímpares de 1 a 100
soma_pares = 0
soma_impares = 0

for i in range(1, 101):
    if i % 2 == 0:
        soma_pares += i
    else:
        soma_impares += i

print(f"Soma dos números pares de 1 a 100: {soma_pares}")
print(f"Soma dos números ímpares de 1 a 100: {soma_impares}")

#Codigos exercicio 9
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 9  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

palavra = input("Digite uma palavra: ").strip()
vogais = "aeiouAEIOU"
total_vogais = 0
total_consoantes = 0
for letra in palavra:
    if letra.isalpha():
        if letra in vogais:
            total_vogais += 1
        else:
            total_consoantes += 1

print(f"Total de vogais: {total_vogais}")
print(f"Total de consoantes: {total_consoantes}")

#Codigos exercicio 10
print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - Bloco de Codigo: Exercicio 10  - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

while True:
    operacao = input("Digite a operação (+, -, *, /) ou 'sair' para encerrar: ").strip()
    if operacao.lower() == "sair":
        print("Calculadora encerrada.")
        break

    if operacao not in ['+', '-', '*', '/']:
        print("Operação inválida. Tente novamente.")
        continue

    try:
        num1 = float(input("Digite o primeiro número: "))
        num2 = float(input("Digite o segundo número: "))
    except ValueError:
        print("Entrada inválida. Digite números válidos.")
        continue

    if operacao == '+':
        resultado = num1 + num2
    elif operacao == '-':
        resultado = num1 - num2
    elif operacao == '*':
        resultado = num1 * num2
    elif operacao == '/':
        if num2 == 0:
            print("Erro: divisão por zero.")
            continue
        resultado = num1 / num2

    print(f"Resultado: {resultado}")
    
    #despedida criativa
print("Exercícios concluídos com sucesso! Itadakimassu!")