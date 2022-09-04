<?php

namespace App\Observers;

use App\Exceptions\EntidadException;
use App\Models\Entidad;
use App\Models\User;

class EntidadObserver
{
    /**
     * Handle the Day "created" event.
     *
     * @param   Entidad $entidad
     * @throws  \App\Exceptions\EntidadException
     */
    public function creating(Entidad $entidad)
    {
        $user = User::where('id',$entidad->user_id)->first();
        $entidades = Entidad::whereUserId($user->id)->get();

        foreach ($entidades as $userEntidad)
        {
            if($userEntidad->nombreEntidad===$entidad->nombreEntidad)
            {
                throw new EntidadException();
            }
        }
    }
}
