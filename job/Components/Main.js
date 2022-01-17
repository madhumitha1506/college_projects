import React from 'react';
import {View, Text} from 'react-native';
export default class Main extends React.Component {
  render() {
    return (
      <View style={{flex: 1, backgroundColor: '#ffdbc5'}}>
        <Text style={{padding: 30, fontSize: 20, fontWeight: 'bold'}}>
          Welcome
        </Text>
      </View>
    );
  }
}
