import React from "react"; 
import { database } from "../firebase";

export const saveUser = (Id,Name,Email,primaryskill,secondaryskill,skill) => {
    return new Promise(function(resolve, reject) {
        let key;
        if (Id != null) {
          key = Id;
        } else {
          key = database.ref().push().key;
        }
        let dataToSave = {
          Id: key,
          Name: Name,
          Email: Email,
          primaryskill:primaryskill,
          secondaryskill:secondaryskill,
          skill:skill,
        };
        database.ref('users/')
          .update(dataToSave)
          .then(snapshot => {
            resolve(snapshot);
          })
          .catch(err => {
            reject(err);
          });
      });
}

