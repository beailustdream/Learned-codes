preco_livro = 26.50
preco_caneta = 10.00

# 1. Soma
total_compra = preco_livro + preco_caneta
print(f"O total da compra é: {total_compra}")

# 2. Subtração
total_desconto = total_compra - 4
print(f"Descontando 5 do valor da compra: {total_desconto}")

# 3. Divisão inteira
divisao = total_desconto // 2
print(f"Dividindo o valor por 2 (inteiro): {divisao}")

# 4. Módulo (resto da divisão) para verificar se é par
eh_par = (divisao % 2) == 0
print(f"O total da compra é um valor par? {eh_par}")