<?php
namespace Core\Console;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {
  public function getCommands() {
    return [
      \Core\Console\Commands\SetCommand::class
    ];
  }
}
