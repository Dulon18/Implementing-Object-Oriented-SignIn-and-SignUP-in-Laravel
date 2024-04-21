
Single Responsibility Principle (SRP)
The Single Responsibility Principle advocates that a class should have only one reason to change. In Laravel, this translates to ensuring that each class is responsible for a single aspect of your application.

Interface Segregation Principle (ISP)
In Laravel, the Interface Segregation Principle emphasizes designing focused and cohesive interfaces. Instead of creating monolithic interfaces, design interfaces that are specific to the needs of the implementing classes.

Consider an interface for a caching service. Instead of bundling all caching methods into a single interface, segregate them based on functionality.


## Installation Instructions

Clone the repo.

Run 'composer install'

Run 'cp .env.example .env'

Run 'php artisan key:generate'

Run 'php artisan migrate'

Run 'php artisan serve'
