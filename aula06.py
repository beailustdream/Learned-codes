notaA = float(input("Digite a primeira nota: "))
notaB = float(input("Digite a segunda nota: "))
media = (notaA + notaB) / 2
if media >= 7:
    print("Aprovado")
elif media >= 5:
    print("Recuperação")
else:
    print("Reprovado")
# O código acima calcula a média de duas notas e imprime a situação do aluno (aprovado, recuperação ou reprovado) com base na média.