<?php
namespace App\Command;

use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * CreateUser command.
 * @property UsersTable $Users
 */
class CreateUserCommand extends Command
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/3.0/en/console-and-shells/commands.html#defining-arguments-and-options
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser = parent::buildOptionParser($parser);
        $parser->setDescription('Add a user to login on api!');
        $parser->addArgument('name', [
            'help' => 'Name of user',
            'required' => true
        ]);
        $parser->addArgument('lastname', [
            'help' => 'Last name of user',
            'required' => true
        ]);
        $parser->addArgument('username', [
            'help' => 'username of user',
            'required' => true
        ]);
        $parser->addArgument('password', [
            'help' => 'password are so strong',
            'required' => true
        ]);
        $parser->addArgument('phone', [
            'help' => 'Phone to 2 factor authentication mode!',
            'required' => true
        ]);
        $parser->addArgument('role', [
            'help' => 'role of user',
            'required' => false
        ]);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $userData = [
            'username' => $args->getArgument('username'),
            'password' => $args->getArgument('password'),
            'name' => $args->getArgument('name'),
            'lastname' => $args->getArgument('lastname') ?? '',
            'role' => $args->getArgument('role') ?? 'user',
            'phone' => $args->getArgument('phone')
        ];

        try {
            $entity = $this->Users->addUserOrFail($userData);
        } catch (\Cake\ORM\Exception\PersistenceFailedException $exception) {
            $io->error('Some error occur: '.$exception->getMessage());
        }
        $io->success('User added with success, username is '.$entity->username.' password: '.$entity->password.' without 2fa disabled');
    }
}
