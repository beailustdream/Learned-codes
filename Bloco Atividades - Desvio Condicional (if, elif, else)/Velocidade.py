# Definindo variáveis
velocidade = 120
limite_velocidade = 80

# Verificação da situação
if velocidade <= limite_velocidade:
    print("Velocidade OK")
elif velocidade <= limite_velocidade * 1.5:
    print("Multado")
else:
    print("Perigo, velocidade muito alta")
