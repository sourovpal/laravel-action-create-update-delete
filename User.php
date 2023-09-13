class User extends Model 
{

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            // ... code here
        });

        self::created(function($model){
            // ... code here
        });

        self::updating(function($model){
            // ... code here
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }

}


Model::creating(function($model){});
Model::updated(function($model){});
Model::updating(function($model){});
Model::deleted(function($model){});
Model::deleting(function($model){});
Model::saving(function($model){});
Model::saved(function($model){});


public static function create(array $attributes = [])
{
    $model = new static($attributes);
    $model->save();
    return $model;
}

public static function boot()
{
    parent::boot();

    // covers created and saved events, as create() method triggers save()
    static::saved(function($model) {
        // do xyz
    });
}

public static function boot()
{
    parent::boot();

    static::created(function($model) {
        // do xyz
    });

    static::saved(function($model) {
        // do xyz
    });
}



use App\Observers\NewsObserver;
use App\Observers\FileObserver;

class AppServiceProvider extends ServiceProvider
{
/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    News::observe(NewsObserver::class);
    File::observe(FileObserver::class);
}

namespace App\Observers;
use App\News;

class NewsObserver
{
/**
 * Listen to the News updated event.
 *
 * @param  \App\News $item
 * @return void
 */
public function updating(News $item)
{
    $publish_at = request()->input('publish_at');
    $item->publish_at = $publish_at ? $publish_at : $item->publish_at;
    dd($item);
}

protected static function boot()
{
    parent::boot();

    static::updated(function ($model) {
        $collector = resolve('touristsCollector');
        $collector->updated[] = $model;
    });
}






