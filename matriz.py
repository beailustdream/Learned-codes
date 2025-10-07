# matriz 3x3
matriz = [
    ['item 1', 'item 2', 'item 3'],
    ['item 4', 'item 5', 'item 6'],
    ['item 7', 'item 8', 'item 9']
]

# Linha 1, Coluna 2
print(matriz[1][2]) # Saída: item 6
print()

# exibindo a matriz (uma lista com varias linhas
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print() 
