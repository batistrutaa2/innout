<?php
class Login  extends Model {
    
    public function validate()
    {
        $errors = [];
        if (!$this->email) {
            $errors['email'] = "E-mail é um campo obrigatorio.";
        }

        if (!$this->password) {
            $errors['password'] = "A senha é obrigatoria.";
        }

       if (count($errors) > 0) {
        throw new ValidationException($errors);
       }
    }


    public function chechLogin()
    {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if ($user) {
            if ($user->end_date) {
                throw new AppException("Usuario Desligado da Empresa!");
            }

            if (password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException("Usuario/Senha Inválidos.");
        
    }

}