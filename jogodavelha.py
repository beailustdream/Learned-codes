#desafio do jogo da velha

#autor: Beatriz Gonçalves

#data: 19/09/2025

print()

print("- - - - - - - - - - - - - - - - - - - - -")

print("- - - Bloco de Codigo: Desafio      - - -")

print("- - - - - - - - - - - - - - - - - - - - -")



import os



# Função para limpar o console

def limpar_console():

    os.system('cls' if os.name == 'nt' else 'clear')



# Funções para colorir os jogadores

def colorir(valor):

    if valor == 'X':

        return f"\033[91m{valor}\033[0m"  # Vermelho

    elif valor == 'O':

        return f"\033[94m{valor}\033[0m"  # Azul

    else:

        return valor  # '-'



# Exibir tabuleiro

def exibir_tabuleiro(tabuleiro):

    print("    0   1   2")

    print("  -------------")

    for i, linha in enumerate(tabuleiro):

        linha_colorida = [colorir(c) for c in linha]

        print(f"{i} | " + " | ".join(linha_colorida) + " |")

        print("  -------------")



# Verificar vencedor

def verificar_vencedor(tabuleiro):

    for i in range(3):

        if tabuleiro[i][0] == tabuleiro[i][1] == tabuleiro[i][2] != '-':

            return tabuleiro[i][0]

        if tabuleiro[0][i] == tabuleiro[1][i] == tabuleiro[2][i] != '-':

            return tabuleiro[0][i]

    if tabuleiro[0][0] == tabuleiro[1][1] == tabuleiro[2][2] != '-':

        return tabuleiro[0][0]

    if tabuleiro[0][2] == tabuleiro[1][1] == tabuleiro[2][0] != '-':

        return tabuleiro[0][2]

    return None



# Função para jogar uma partida

def jogar_partida(pontuacao):

    tabuleiro = [['-' for _ in range(3)] for _ in range(3)]

    

    for jogada in range(9):

        limpar_console()

        print(f"\nPontuação: X = {pontuacao['X']} | O = {pontuacao['O']}")

        exibir_tabuleiro(tabuleiro)

        

        jogador = 'X' if jogada % 2 == 0 else 'O'

        print(f"\nVez do jogador {jogador}")

        

        while True:

            try:

                linha = int(input("Digite a linha (0-2): "))

                coluna = int(input("Digite a coluna (0-2): "))

                if tabuleiro[linha][coluna] == '-':

                    tabuleiro[linha][coluna] = jogador

                    break

                else:

                    print("Posição ocupada! Tente outra.")

            except (ValueError, IndexError):

                print("Entrada inválida! Digite números entre 0 e 2.")

        

        vencedor = verificar_vencedor(tabuleiro)

        if vencedor:

            limpar_console()

            exibir_tabuleiro(tabuleiro)

            print(f"\n\033[92mParabéns! Jogador {vencedor} venceu!\033[0m")

            pontuacao[vencedor] += 1

            return

    

    limpar_console()

    exibir_tabuleiro(tabuleiro)

    print("\n\033[93mEmpate! Nenhum jogador venceu.\033[0m")



# Loop principal do jogo

def main():

    pontuacao = {'X': 0, 'O': 0}

    

    while True:

        jogar_partida(pontuacao)

        print(f"\nPontuação atual: X = {pontuacao['X']} | O = {pontuacao['O']}")

        escolha = input("\nDeseja jogar novamente? (s/n): ").lower()

        if escolha != 's':

            print("\nObrigado por jogar! Até a próxima!")

            break



# Iniciar o jogo

if __name__ == "__main__":

    main()

print()

print("- - - - - - - - - - - - - - - - - - - - -")

print("Desafio concluido! Nah, I'd Win!")

print("- - - - - - - - - - - - - - - - - - - - -")
