# Definindo a senha correta
senha_correta = "python123"

# Usuário digita a senha
senha_digitada = input("Digite sua senha: ")

# Verificação
if senha_digitada == senha_correta:
    print("✅ Acesso permitido! Bem-vindo.")
else:
    print("❌ Senha incorreta. Tente novamente.")
