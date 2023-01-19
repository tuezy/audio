<?php
namespace App\Repository\Base;

use Illuminate\Support\Facades\Cache;

class CacheRepositoryAdapter{

    /**
     * @var Repository
     */
    protected $repository;


    public function cache(Repository $repository){
        $this->repository = $repository;
        return Cache::remember($this->cacheKey(), 15, function () {
            return $this->comments->count();
        });
    }

    private function cacheKey()
    {
        $model = $this->repository->getModel();
        if(!isset($model->update_at)){
            return sprintf(
                "%s/%s-%s",
                $model->getTable(),
                $model->getKey(),
                date('Y_m_d_H')
            );
        }
        return sprintf(
            "%s/%s-%s",
            $model->getTable(),
            $model->getKey(),
            $model->update_at->timestamp
        );
    }

}
