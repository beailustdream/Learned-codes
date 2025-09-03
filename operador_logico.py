# 1. Armazenar a média do aluno.
# 2. Armazenar a presença do aluno.
# 3. Se a média for maior ou igual a 7 E a presença for maior que 0.75:
# 4.   Atribuir True à variável 'aprovado'.
# 5. Caso contrário:
# 6.   Atribuir False à variável 'aprovado'.
# 7. Exibir o resultado.

media = 8.5
presenca = 0.8  # 80% de presença

# Condição para aprovação: média >= 7 E presenca > 0.75
aprovado = (media >= 7) and (presenca > 0.75)
print(f"O aluno foi aprovado? {aprovado}")  # Saída: True

# exemplo de uso do "not"
reprovado_por_falta = not (presenca > 0.75)
print(f"O aluno foi reprovado por falta? {reprovado_por_falta}") 