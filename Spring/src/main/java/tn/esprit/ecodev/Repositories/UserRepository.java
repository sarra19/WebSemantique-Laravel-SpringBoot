package tn.esprit.ecodev.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import tn.esprit.ecodev.Entities.User;
import java.util.Optional;
@Repository


public interface UserRepository extends JpaRepository<User, Long> {
    Optional<User> findByEmail(String email);

}