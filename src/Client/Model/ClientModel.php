<?php

namespace Client\Model;

class ClientModel extends \Core\Model\CompanyModel {

    /**
     * @return \Core\Entity\People
     */
    public function getCurrentPeopleCompany() {
        if ($this->getErrors()) {
            return;
        }
        return $this->_company_id ? $this->_em->getRepository('\Core\Entity\People')->find($this->_company_id) : null;
    }

    public function getAllCompanies() {
        //return $this->_em->getRepository('\Core\Entity\PeopleClient')->findBy(array('company' => $this->getCurrentPeopleCompany()), array('name' => 'ASC'), 100);
    }

    public function addCompanyLink($entity_people, $currentPeopleCompany) {
        $people_employee = new \Core\Entity\ClientPeople();
        $people_employee->setCompanyId($currentPeopleCompany->getId());
        $people_employee->setClient($entity_people);
        $this->_em->persist($people_employee);
        $this->_em->flush($people_employee);
    }

}
