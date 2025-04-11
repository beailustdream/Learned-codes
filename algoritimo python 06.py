def regressiva(i):
    print (i)
    regressiva(i-1)
    if i <= 1:
        return
    else: regressiva(i-1)

    def fatorial(n):
        if n == 0:
            return 1
        else:
            return n * fatorial(n-1)
        
        def soma(lista):
            total = 0
            for x in lista:
                total += x
            return total    
        print(soma([1, 2, 3, 4, 5]))
        # deve retornar 15