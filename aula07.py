qtd = 0
soma = 0
media = 0
valor = float(input("Digite um valor: "))
while valor != 0:
    soma += valor
    qtd += 1
    valor = float(input("Digite um valor: "))
    print("A soma dos valores é: ", soma)
    print("A quantidade de valores é: ", qtd)
    if qtd > 0:
        media = soma / qtd
        print("A média dos valores é: ", media)
    else:
        print("Nenhum valor foi digitado.")
# # O código acima lê valores do usuário até que o valor 0 seja digitado, calcula a soma, a quantidade e a média dos valores digitados, e imprime os resultados.