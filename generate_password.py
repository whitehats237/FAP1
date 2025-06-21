import random
import string

def generate_password():
    print("Quel type de mot de passe souhaitez-vous ?")
    print("1 - Alphabétique seulement")
    print("2 - Alphabétique + Numérique")
    print("3 - Alphabétique + Numérique + Caractères spéciaux")

    choice = input("Votre choix (1/2/3) : ")

    length = int(input("Longueur du mot de passe souhaitée (ex : 8, 10, 12) : "))

    if choice == '1':
        characters = string.ascii_letters
    elif choice == '2':
        characters = string.ascii_letters + string.digits
    elif choice == '3':
        characters = string.ascii_letters + string.digits + string.punctuation
    else:
        print("Choix invalide.")
        return

    password = ''.join(random.choice(characters) for _ in range(length))
    print(f"\n👉 Ton mot de passe généré est : {password}")

if __name__ == "__main__":
    generate_password()
