<?php
namespace App\State;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\UserDto;
use App\Entity\User;
final class UserProcessor implements ProcessorInterface
{
    /**
     * @param User $data
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        return new UserDto(
            $data->getEmail(),
            $data->getNombre(),
            $data->getNombredos(),
            $data->getApellido(),
            $data->getApellidodos(),
            $data->getTelefono(),
            $data->getDocumento()

         );
    }
}