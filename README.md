# About
<!-- 
    Online Exam System is a system that allow teacher to create exam for doing with student.
    This is laravel 10 intergrate with laravel breez 
*** -->

test


## Git Clone
 * Note: "feature/add-new-functionality" is the name of branch that your're doing.

1. Clone From Github
    ```cmd
     git clone https://github.com/HINCHEU/Ecommerce.git
    ```

    
2. Install Vendor by using composer
    ```cmd: 
    composer install --ignore-platform-reqs
    ```
    
    ```cmd: 
    cp .env.example .env
    ```
    ```cmd: 
    php artisan key:generate
    ```

3. Connect Project to database (.env)
    - Set DB_DATABASE, DB_USERNAME, and DB_PASSWORD to match your local MySQL setup.
    ```cmd: 
    composer require paypal/rest-api-sdk-php
    ```

4. Migrate Database

    (create mysql database name : online_exam_db )
    ```cmd: 
    php artisan migrate:fresh --seed
    ```
5. create new branch 
    ```cmd:
        git checkout -b feature/add-new-functionality
    ```

5. Have fun
    ```cmd: 
    php artisan serve
    ```
 ---
# Code Document   
### ERROR MESSAGE ALTER
```php
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </section>
```

## Commit progress back

1. make change to Project

2. stage and commit 
```cmd:
   git add .
   git commit -m "fix: add (feature that your're doing)"
```

2. stage and commit 
```cmd:
   git push origin feature/add-new-functionality
```
3. make pull new request in Github

## Pull from main branch
1. pull 
```cmd;
git checkout main
git pull origin main

```
2. back to your branch
```
git checkout feature/add-new-functionality
```
3. merge your branch with main
```cmd:
git merge main
```
3. Resolve Any Conflicts (if necessary):
```cmd:
git add .
git commit -m "Resolve merge conflicts"
git push origin feature/add-new-functionality

```
