# Algoritmo para encontrar o menor elemento de uma lista e seu índice
def buscaMenor(arr):
    menor = arr[0]     # Inicializa o menor com o primeiro elemento
    menor_indice = 0    # Inicializa o índice do menor com 0
    for i in range(1, len(arr)):    # Começa do segundo elemento
        if arr[i] < menor:      # Se o elemento atual for menor que o menor encontrado até agora
            menor = arr[i]                  
            menor_indice = i                        
    return menor_indice  # Return statement is now inside the function                 
