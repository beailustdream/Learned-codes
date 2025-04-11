# abordagem em loop while
# Algoritmo para encontrar uma chave em uma caixa
def procure_pela_chave(caixa_principal, main_box):
    pilha = main_box.crie_uma_pilha_para_busca()
    while not pilha.esta_vazia():
        caixa = pilha.pegue_caixa()
    for item in caixa:
        if item.e_uma_caixa():
            procure_pela_chave(item)
        elif item.e_uma_chave():
            print("a chave foi encontrada")
    return item # Retorna a chave encontrada

# abordagem em recursão
def procure_pela_chave(caixa):
    for item in caixa:
        if item.e_uma_caixa():
            procure_pela_chave(item)
        elif item.e_uma_chave():
            print("a chave foi encontrada")
    return item # Retorna a chave encontrada