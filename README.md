# Whats new in Laravel 8 

- Models directory

- For bigger projects. Dont run all the migrations on migrate:fresh all the time. There is a new command
schema:dump that creates a database/schema/mysql-schema.sql file that
dumps all the migrations into on file.
schema:dump --prune will delete the migrations from database folder.    
Now if you run pa migrate:fresh it will load first the stored database schema files.

- Class based model factories, new HasFactory trait in the model
In tinker: App\Models\User::factory()->make();
Add another function in the Model Class if you want to change the state
of the default definitions method. 
Then in tinker you can call the methods: Post::factory()->nameOfMethod()->make();

- Model factory relationships
If you have user_posts relationship
In tinker:
User has 5 posts
User::factory()->has(Post::factory()->count(5))->create();
OR
User::factor()->hasPosts(5)->create();
Reverse: 3 posts belongs to 1 user
Post::factory()->for(User::factory())->count(3)->create();
OR
Post::factory()->forUser()->count(3)->create();
If you write Post::factory()->count(3)->create();
It will create 3 posts and each of those posts will belong to new user.

- Maintenance mode  
run pa down when you need to make important updates
pa down --secret=nikola - it turn to maintenance mode, but if you run
laravel8.tes/nikola it goes up. 
Laravel sets a cookie.
Composer install breaks the maintenance down. If the page was down and run composer install, you wont
see the error view anymore. That's where you add prerender the view. 
You can style your error messages in the views. 
pa down --render="yourfile"
pa down --render="errors::503"
pa vendor:publish
pa down --render="errors.illustrated-style"

- Cleaner Closure-based Event Listeners
If its a small project to listen an event jeffrey writes events.php file
in routes/ and add it to a EventServiceProvider boot method.
There is a queueable function that allow us to queue the event.

- Wormholes 
New travel method for testing that can print dates in the future and check
if the condition is met.

#New things that I learned
- ls database/migrations | wc -l 
It counts the files in the folder
Command for word count by line  

- In pa tinker:
use App\Modes\User; to cd to User;
use App\Models\{User, Post};
User::factory->count(3)->make(); 
It gives you a collection of 3 users.

