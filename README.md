# 🔑 Password Generator

repo: `php-strong-password-generator`

## 📚 Assignment

Build a "secure" password generator.

- Build a **form** that **allows the user to specify the length of the password**.
- Use a **function** to generate a **random password of the specified length**.
- **Move** the password generation **function to a dedicated file**.

### 🎯 Bonus tasks
- Move password display to a **new page**: redirect to the new page and **use session variables to get form data**.
- **Handle more** password/form **parameters**, e.g. *repeated characters (yes/no)* or *kind of characters*.

### ✨ Features implemented

The form (`index.php`) allows the user to generate a **random password <small>(1)</small> of a requested length, <small>(2)</small> with or without repeated characters <small>(3)</small> from a specified pool of possible characters** (lowercase and/or uppercase letters, numbers, special characters).

A **pop-up alert** informs the user **if the selected characters are not enough** to generate a password of the requested length.

The **password is generated** by the `generatePassword()` function **and displayed on a new page** (`your-password.php`), alongside a **recap of the user's choices**.

Thanks to a `form-submitted` session variable, the output page (`your-password.php`) **checks the origin of the request** and, if the request is not from the form, **redirects to the form page**.

A simple **navigation link** lets the user go **back to the form** (from `your-password.php` to `index.php`). <small>[UPDATE — Post-review improvement]</small>

**Form data and session variables are validated and sanitized**.<br>**Default values** are applied if no valid value is provided. <small>For example:
<br>- If no preference forrepeated characters has been selected, 'not allowed' is applied.
<br>- If no character type has been selected, all character types are applied.</small>

## Personal Notes

As a Boolean Web Development student, this was my second PHP project.

Building this application, step by step, meant dealing with a progressively growing complexity.

*<div align="center"><small>Three parameters are way too much for a single function, right?<br>But what about storing them inside an associative array instead?</small></div>*

So... I kept refactoring the code in order to keep it as clean and readable as possible.
<br><br>

A good coding day to you!

— Francesca 

PS. As you can see, I've been **experimenting with commit messages**. I recently discovered [Conventional Commits](https://www.conventionalcommits.org/en) and I'm trying to improve the quality of my messages for future reference and team work.

PPS. After watching the teacher's solution video, I added a **navigation link "back to form"** to the `your-password.php` page. I also **refactored the character pools** — now stored as strings instead of character arrays — and updated the related logic accordingly.