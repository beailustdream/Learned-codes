print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - mini tamanho - - -")
print("- - - - - - - - - - - - - - - - - - - - -")

matriz = [
    [1, 2],
    [3, 4],
    [5, 6],
    [7, 8],
    [9, 10],
]

print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print()
print("- - - - - - - - - - - - - - - - - - - - -")

print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - medium tamanho - - -")
print("- - - - - - - - - - - - - - - - - - - - -")
# matriz 4x4
matriz = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16],
    [17, 18, 19, 20],
]
print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print("- - - - - - - - - - - - - - - - - - - - -")

print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - grande tamanho - - -")
print("- - - - - - - - - - - - - - - - - - - - -")
# matriz 10x10
matriz = [
    [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    [21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
    [31, 32, 33, 34, 35, 36, 37, 38, 39, 40],
    [41, 42, 43, 44, 45, 46, 47, 48, 49, 50],
    [51, 52, 53, 54, 55, 56, 57, 58, 59, 60],
    [61, 62, 63, 64, 65, 66, 67, 68, 69, 70],
    [71, 72, 73, 74, 75, 76, 77, 78, 79, 80],
    [81, 82, 83, 84, 85, 86, 87, 88, 89, 90],
    [91, 92, 93, 94, 95, 96, 97, 98, 99 ,100],
]
print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print("- - - - - - - - - - - - - - - - - - - - -")
print()

print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - mais grande tamanho - - -")
print("- - - - - - - - - - - - - - - - - - - - -")
# matriz 20x20
matriz = []
contador = 1
for i in range(20):
    linha = []
    for j in range(20):
        linha.append(contador)
        contador += 1
    matriz.append(linha)
print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print("- - - - - - - - - - - - - - - - - - - - -")

print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - maior ainda tamanho - - -")
print("- - - - - - - - - - - - - - - - - - - - -")
# matriz 50x50
matriz = []
contador = 1
for i in range(50):
    linha = []
    for j in range(50):
        linha.append(contador)
        contador += 1
    matriz.append(linha)
print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print("- - - - - - - - - - - - - - - - - - - - -")

print()
print("- - - - - - - - - - - - - - - - - - - - -")
print("- - - maior tamanho que o anterior - - -")
print("- - - - - - - - - - - - - - - - - - - - -")
# matriz 100x100
matriz = []
contador = 1
for i in range(100):
    linha = []
    for j in range(100):
        linha.append(contador)
        contador += 1
    matriz.append(linha)
print()
print("=== Exibindo a matriz ===")
for linha in matriz:
    for valor in linha:
        print(valor, end=" ")
    print()
print("- - - - - - - - - - - - - - - - - - - - -")
