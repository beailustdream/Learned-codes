def buscaMenor(arr):
    menor = arr[0]  # Assume que o primeiro elemento é o menor
    menor_indice = 0  # Índice do menor elemento
    for i in range(1, len(arr)):
        if arr[i] < menor:
            menor = arr[i]
            menor_indice = i
    return menor_indice  # Retorna o índice do menor elemento

def ordenacaoporSelecao(arr):
    novoArr = []  # Lista para armazenar os elementos ordenados
    for i in range(len(arr)):
        menor_indice = buscaMenor(arr)  # Chama a função buscaMenor para encontrar o menor elemento 
        novoArr.append(arr.pop(menor_indice))  # Remove o menor elemento da lista original e adiciona à nova lista
    return novoArr  # Retorna a lista ordenada  
print(ordenacaoporSelecao([5, 3, 6, 2, 10])) # deve retornar [2, 3, 5, 6, 10]
# Testando a função com uma lista de strings    