<?php

namespace CS\Enums;

abstract class FileOperationResults
{
    const AlreadyExists       = "FILE_ALREADY_EXISTS";
    const DoesNotExists       = "FILE_DOES_NOT_EXISTS";

    const CannotBeOpened      = "FILE_CANNOT_BE_OPENED";
    const CannotBeRemoved     = "FILE_CANNOT_BE_REMOVED";
    const CannotBeSaved       = "FILE_CANNOT_BE_SAVED";
    
    const SuccessfullyCreated = "FILE_SUCCESSFULLY_CREATED";
    const SuccessfullyRemoved = "FILE_SUCCESSFULLY_REMOVED";
    const SuccessfullySaved   = "FILE_SUCCESSFULLY_SAVED";
}