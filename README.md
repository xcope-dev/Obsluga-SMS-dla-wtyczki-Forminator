# Obsługa SMS dla wtyczki Forminator

## Spis treści
- [Opis](#opis)
- [Funkcjonalności](#funkcjonalności)
- [Wymagania](#wymagania)
- [Instalacja](#instalacja)
- [Alternatywna instalacja](#alternatywna-instalacja)
- [Konfiguracja](#konfiguracja)
- [Użytkowanie](#użytkowanie)
- [Licencja](#licencja)

---

## Opis
Ten projekt zapewnia integrację obsługi SMS z wtyczką **Forminator** dla WordPress. Wykorzystuje **SerwerSMS API** do wysyłania powiadomień SMS na podstawie przesłanych formularzy. Implementacja koncentruje się na przetwarzaniu danych przesłanych przez określone formularze oraz wysyłaniu odpowiednich powiadomień SMS.

---

## Funkcjonalności
- Integracja z wtyczką **Forminator** w celu obsługi przesyłania formularzy.
- Wysyłanie powiadomień SMS za pomocą **SerwerSMS API**.
- Zapis logów dla celów debugowania.
- Wysoka konfigurowalność dla określonych formularzy.

---

## Wymagania
- **WordPress 5.0+**
- Zainstalowana i aktywowana wtyczka **Forminator**.
- **PHP 7.4+**
- Konto w **SerwerSMS** (https://serwersms.pl/api).

---

## Instalacja
1. **Pobierz lub sklonuj repozytorium:**
   ```bash
   git clone <adres-repozytorium>
   ```
2. **Prześlij plik:**
   - Umieść dostarczony plik PHP (`newserwersms2.php`) w katalogu motywu lub motywu potomnego pod ścieżką `/wp-content/themes/nazwa-twojego-motywu/`.
3. **Aktywuj skrypt:**
   - Upewnij się, że plik jest dołączony w pliku `functions.php`:
     ```php
     include_once get_template_directory() . '/newserwersms2.php';
     ```

---

## Alternatywna instalacja
Kod można również bezpośrednio umieścić w pliku `functions.php` bez potrzeby dodawania osobnego pliku. Wystarczy skopiować całą zawartość pliku `newserwersms2.php` i wkleić ją na końcu pliku `functions.php` w aktywnym motywie lub motywie potomnym.

---

## Konfiguracja
1. **Dane dostępowe API SerwerSMS:**
   - Zastąp dane logowania w kodzie swoimi danymi: **login**, **hasło** oraz **nazwa nadawcy**.
   ```php
   $api_login = 'twoj_api_login';
   $api_password = 'twoje_api_haslo';
   $sender_name = 'TwojaNazwaNadawcy';
   ```
2. **Konfiguracja ID formularza:**
   - Zaktualizuj ID formularza (domyślnie: `634`) w kodzie, aby pasował do formularza, który chcesz obsługiwać:
   ```php
   if( $form_id == 634 )
   ```

---

## Użytkowanie
1. Prześlij skonfigurowany formularz za pomocą wtyczki Forminator.
2. Po pomyślnym przesłaniu formularza powiadomienie SMS zostanie wysłane automatycznie.
3. Logi dla celów debugowania są zapisywane w logach błędów WordPress.

---

## Licencja
Ten projekt jest objęty licencją [MIT License](LICENSE).

